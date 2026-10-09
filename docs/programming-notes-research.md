# Scribble: programming notes research and design direction

Researched 9 October 2026. These are selected product patterns and qualitative Reddit discussions, not a representative survey or a popularity ranking.

## What programmers describe

- Small, searchable notes about one task or concept. A descriptive title, working snippet, source, and caveats make a note useful months later. [Programming/CS note structures](https://www.reddit.com/r/ObsidianMD/comments/16bo0ja/those_who_are_learning_programming_or_computer/) and [programming how-to notes](https://www.reddit.com/r/ObsidianMD/comments/wwsvhm/).
- Capture should not interrupt coding along with a lesson. Rough notes can become clearer explanations afterward. [Taking notes while coding](https://www.reddit.com/r/ObsidianMD/comments/1frjgsh/).
- Common uses include CLI commands, reusable snippets, project documentation, bugs, and explanations tailored to the writer’s current level. Too much basic material can become clutter. [How developers use Obsidian](https://www.reddit.com/r/ObsidianMD/comments/1m4jkfe/how_do_developers_use_obsidian/).
- Copying a command should return the command itself, without formatting markers. [Code copy/paste discussion](https://www.reddit.com/r/ObsidianMD/comments/1w5pgu3/code_copy_pasta/).

## Product patterns worth borrowing

| Product | Documented pattern | Scribble direction |
| --- | --- | --- |
| Notion | Language-aware code blocks, copy and wrapping controls | Separate code surface, visible copy action, optional wrapping |
| Obsidian | Search and connected notes | Persistent library navigation, search and tag/notebook routes; note linking is a future feature |
| Bear | Editor-only mode and a restrained writing interface | Focus mode with navigation and properties out of the way |
| Joplin | Markdown import/export and backup formats | Portability is a future priority, distinct from this visual redesign |

Sources: [Notion code blocks](https://www.notion.com/en-gb/help/code-blocks), [Obsidian search](https://obsidian.md/help/plugins/search), [Obsidian linked notes](https://obsidian.md/help/link-notes), [Bear editor-only mode](https://bear.app/faq/hide-the-sidebar-and-note-list-on-mac-and-ipad/), [Joplin import/export](https://joplinapp.org/help/apps/import_export/).

## Implemented in this pass

Consistent workspace navigation; redesigned create/edit/read views; focused writing and reading; live word count; Cmd/Ctrl+S saves through normal form validation; code wrapping alongside the existing copy action; notebook covers and empty states; sectioned account settings; split authentication layout and matching recovery/verification pages; updated landing page. Light and dark palettes and small-screen layouts remain supported.

## Further product work

1. Safe Markdown rendering and syntax highlighting for snippets.
2. Markdown export with title, source, language, tags, and dates.
3. Links between related explanations, fixes, and project notes.
4. Recoverable deletion and note history.
5. Draft recovery with clear privacy and storage behavior.

These are recommendations, not features shipped in the current redesign. Focus mode is temporary, and saving remains explicit; there is no autosave.
