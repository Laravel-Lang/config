<?php

declare(strict_types=1);

namespace LaravelLang\Mona\Commands\Cldr;

use LaravelLang\LocaleList\Locale;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function env;
use function file_put_contents;
use function json_encode;
use function Laravel\Prompts\task;

abstract class CldrCommand extends Command
{
    protected string $directory;

    protected int $jsonOptions = JSON_THROW_ON_ERROR
    | JSON_UNESCAPED_SLASHES
    | JSON_UNESCAPED_UNICODE;

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        foreach (Locale::options() as $name => $code) {
            task('aaaa.' . $name, fn () => $this->handle($code));
        }

        return self::SUCCESS;
    }

    abstract protected function perform(string $forCode, string $locale): array;

    protected function handle(string $code): void
    {
        $data = [];

        foreach (Locale::values() as $locale) {
            $data[$locale] = $this->perform($code, $locale);
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
}
