import * as assert from "uvu/assert";
import { describe } from "./helpers";
import { ipsum, paragraph, sentence } from "../src";
import { MODES, PARAGRAPH_LENGTH, STARTER } from "../src/lib/constants";
import gurt from "../src/lib/filler";
import filler from "../src/lib/filler";

describe("sentence", it => {
  const s = sentence();
  it("returns the correct type", () => assert.type(s, "string"));
});

describe("paragraph", it => {
  const p = paragraph();
  it("returns the correct type", () => assert.type(p, "string"));

  it("should return the correct length", () => {
    const inRange =
      PARAGRAPH_LENGTH >= PARAGRAPH_LENGTH &&
      PARAGRAPH_LENGTH <= PARAGRAPH_LENGTH + 50;

    assert.is(inRange, true);
  });
});

describe("ipsum", it => {
  const base = ipsum();
  it("returns the correct type", () => {
    assert.instance(base, Array);
  });

  it("should return the correct number of paragraphs", () => {
    const length = 13;
    const i = ipsum({ length });

    assert.is(i.length, length);
  });

  it("should start with 'all right me luvver'", () => {
    const [firstParagraph] = base;

    assert.is(firstParagraph.startsWith(STARTER), true);
  });

  it("should not contain any filler words in gurt mode", () => {
    const i = ipsum({ mode: MODES.GURT });

    const matches = i
      .map(paragraph => filler.every(word => paragraph.includes(word)))
      .some(result => result);

    assert.is(matches, false);
  });
});
