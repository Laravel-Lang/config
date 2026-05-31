<?php

declare(strict_types=1);

namespace LaravelLang\Mona\Commands\Cldr;

use Illuminate\Support\Str;
use LaravelLang\LocaleList\Locale;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function env;
use function file_get_contents;
use function file_put_contents;
use function json_decode;
use function json_encode;
use function Laravel\Prompts\task;
use function str_replace;

abstract class CldrCommand extends Command
{
    protected string $directory;

    protected int $jsonOptions = JSON_THROW_ON_ERROR
    | JSON_UNESCAPED_SLASHES
    | JSON_UNESCAPED_UNICODE;

    protected array $loaded = [];

    protected function configure(): void
    {
        $name = $this->commandName();

        $who = Str::after($name, ':');

        $this->setName($name)
            ->setDescription("Update $who names from CLDR");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach (Locale::options() as $name => $code) {
            task($name, fn () => $this->handle($code));
        }

        return self::SUCCESS;
    }

    abstract protected function perform(string $forCode, string $locale): array|string|null;

    protected function handle(string $code): void
    {
        $data = [];

        foreach (Locale::values() as $locale) {
            $data[$locale] = $this->perform($code, $this->convertLocale($locale));
        }

        $this->store($code, $data);
    }

    protected function store(string $code, array $data): void
    {
        file_put_contents($this->directory . '/' . $code . '.json', $this->encode($data));
    }

    protected function encode(array $data): string
    {
        return env('PRETTY_JSON')
            ? json_encode($data, $this->jsonOptions | JSON_PRETTY_PRINT)
            : json_encode($data, $this->jsonOptions);
    }

    protected function convertLocale(string $code): string
    {
        return str_replace('_', '-', $code);
    }

    protected function commandName(): string
    {
        return Str::of(static::class)
            ->classBasename()
            ->snake(':')
            ->toString();
    }

    protected function loadFile(string $path): array
    {
        if (isset($this->loaded[$path])) {
            return $this->loaded[$path];
        }

        $content = file_get_contents(__DIR__ . '/../../../' . $path);

        return $this->loaded[$path] = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    }
}
