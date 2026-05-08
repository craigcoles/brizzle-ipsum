> [!IMPORTANT]
> Alright my luvver, this project is currently under construction. Check back soon!

# Brizzle Ipsum

🗣️ Lorem ipsum inspired by the dialect of Bristolian folk

[![build](https://img.shields.io/github/actions/workflow/status/craigcoles/brizzle-ipsum/.github/workflows/ci.yml?color=%233d7c82)](https://github.com/craigcoles/brizzle-ipsum/actions/workflows/ci.yml)

<!-- [![npm](https://img.shields.io/npm/v/brizzle-ipsum?color=%233d7c82)](https://www.npmjs.com/package/brizzle-ipsum)
[![size](https://img.shields.io/bundlephobia/minzip/brizzle-ipsum?label=size&color=%233d7c82)](https://bundlephobia.com/package/brizzle-ipsum) -->

- 🗜️ **Small**: Just around **1 kB** on modern platforms.
- 🧪 **Reliable**: Fully tested with [100% code coverage](https://codecov.io/gh/craigcoles/brizzle-ipsum).
- 📦 **Typed**: Written in [TypeScript](https://www.typescriptlang.org/) and includes definitions out-of-the-box.
- ⚙️ **Highly configurable**.
- 💨 **Zero dependencies**.

## Introduction

`brizzle-ipsum` is a module for generating passages of lorem ipsum text with a little bit of spice from the folk of Bristol.

## Installation

```bash
npm install brizzle-ipsum
```

## Usage

Import the helpers you need from `brizzle-ipsum`.

```ts
import { ipsum, paragraph, sentence } from "brizzle-ipsum";
```

Generate the default Brizzle Ipsum text:

```ts
const paragraphs = ipsum();

console.log(paragraphs);
// [
//   "All right me luvver ipsum dolor sit amet ...",
//   "...",
//   ...
// ]
```

`ipsum()` returns an array of paragraph strings, so you can join the output when
you need a single block of text.

```ts
const text = ipsum({ length: 3 }).join("\n\n");
```

You can also generate a single paragraph or sentence:

```ts
const copy = paragraph();
const line = sentence();
```

## Options

Pass an options object to `ipsum()` to control the generated output.

```ts
const paragraphs = ipsum({
  length: 5,
  mode: "gurt",
  startsWith: false,
});
```

| Option       | Type                 | Default    | Description                                                                   |
| ------------ | -------------------- | ---------- | ----------------------------------------------------------------------------- |
| `length`     | `number`             | `10`       | The number of paragraphs to generate. Use `0` to return an empty array.       |
| `mode`       | `"filler" \| "gurt"` | `"filler"` | The word list to use. `"filler"` mixes Bristolian phrases with filler text.   |
| `startsWith` | `boolean`            | `true`     | Prefixes the first paragraph with `All right me luvver ipsum dolor sit amet`. |

`sentence()` and `paragraph()` also accept an optional mode argument:

```ts
const gurtSentence = sentence("gurt");
const gurtParagraph = paragraph("gurt");
```
