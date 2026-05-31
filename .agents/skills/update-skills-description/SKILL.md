---

# @formatter:off
name: update-skills-description
description: Contains rules for updating and refreshing the Skills description for AI agents. Use this skill when you need to update and/or improve the Skill description.
# @formatter:on
---

# Skill Description Update

## Important

1. Do not create tests.
2. Do not run tests.
3. Do not inspect tests.
4. All you need to do is update the descriptions of the Skills located in the project.
5. Work only with the following data:
    - Files matching `.agents/skills/*/SKILL.md`
    - At the beginning of each file, there is a section wrapped in `---` characters (frontmatter).
    - Update only the contents of the `description` parameter.
6. When working with a description, follow these rules:
    - The description must be clear and understandable for an AI agent.
    - The description must be current and match the current Skill implementation.
    - The description must be written in English.
    - The description must not be empty.
    - The description must be no longer than 1024 characters.
    - The description must be in a single line.
    - The description must explain what the Skill does and when to use it.
    - Do not use the word "skill" or its derivatives in the description.
    - For similar skills, emphasize the boundaries more clearly.
    - For mutation skills, explicitly state the type of change: adds, replaces, updates, retrieves, or another action.
7. If you believe a description does not need changes, do not change it.

## Useful Documentation

- Specification: https://agentskills.io/specification
- Optimizing skill descriptions: https://agentskills.io/skill-creation/optimizing-descriptions
- Evaluating skill output quality: https://agentskills.io/skill-creation/evaluating-skills

## Task

Your task is to carefully inspect the skills, understand what each one does, and improve each description so the AI agents
that use them can work as effectively as possible.

## Common Mistakes

### The description says "what the API does" but not "when to call it"

This is the most common problem.

Bad:

> Returns task comments.

Better:

> Use when you need to read a task discussion, find agreements, requirement clarifications, or communication history.

So the model needs not only the **effect**, but also the **call scenario**.

### Redundant wording like "use the skill"

This is not critical, but it often makes the text slightly heavier.

It is better to write more simply:

- Use when...
- Call when...
- Suitable for...
