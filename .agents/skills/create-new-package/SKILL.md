---
name: create-new-package
description: Use when you need to add a new package to the Laravel Lang repository.
argument-hint: "[--name <package-name>]"
disable-model-invocation: false
---

# Create a new package

Adds a new package to the project. The result will be a new package in the Laravel Lang repository.

1. Request the package name
2. Create directories and files
3. Add to GitHub actions
4. Add to another location.

## Inputs

- required `--name <package-name>`

If the target package name is missing, derive a concise, general, lowercase-hyphenated name from the material topic or
user goal, such as `starter-kits`, `models`, `routes`, `native-names`, etc.

Before any writing, validate the final target package name:

- It must match `^[a-z0-9\-]+$`.
- Reject empty names, overlong names, `.`, `..`, dots, path separators (`/` or `\`), absolute paths, Windows drive
  paths, and hidden names.

## Workflow

1. Prepare package names.
    - [alias is `<package_namespace>`] For namespaces, convert `<package-name>` to `PascalCase`.
    - [alias is `<package_composer>`] To be used as the package name in Composer, convert `<package-name>` to
      `kebab-case`
      and add the prefix `laravel-lang/`.

2. `.github/ISSUE_TEMPLATE/bug_report.yml`.
    - Add `<package_composer>` to the list of attributes for `environment-package-name`.

3. `.github/ISSUE_TEMPLATE/feature_request.yml`.
    - Add `<package_composer>` to the list of attributes for `environment-package-name`.

4. Create a `.github/previews/<package_namespace>.yml` file.

5. Add `src/<package_namespace>` to the `.github/dependabot.yml` file.

6. Create a directory `src/<package_namespace>` and copy the `LICENSE.md` file into it.
