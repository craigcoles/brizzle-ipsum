import { describe, it } from "node:test";
import assert from "node:assert/strict";
import { ipsum, paragraph, sentence } from "../src";
import { MODES, PARAGRAPH_LENGTH, STARTER } from "../src/lib/constants";
import { generateSentence } from "../src/lib/generator";
import { getPhraseCatalog } from "../src/lib/phrase-catalog";

const gurtCatalog = getPhraseCatalog(MODES.GURT);

// ---------------------------------------------------------------------------
// sentence()
// ---------------------------------------------------------------------------

describe("sentence", () => {
  it("returns a string", () => {
    const s = sentence();
    assert.equal(typeof s, "string");
  });

  it("is not empty", () => {
    const s = sentence();
    assert.ok(s.length > 0);
  });

  it("starts with a capital letter", () => {
    const s = sentence();
    assert.equal(s[0], s[0].toUpperCase());
  });

  it("ends with a period", () => {
    const s = sentence().trim();
    assert.equal(s[s.length - 1], ".");
  });

  it("only contains gurt words in gurt mode", () => {
    // Run multiple times to account for randomness in word selection
    for (let i = 0; i < 20; i++) {
      const s = sentence(MODES.GURT);
      assert.ok(
        gurtCatalog.includesOnly(s),
        `Unexpected non-gurt content in: "${s}"`,
      );
    }
  });

  it("can be generated deterministically through the internal seam", () => {
    const s = generateSentence(gurtCatalog, { next: () => 0 });

    assert.equal(
      s,
      "Alright me luvver alright me luvver alright me luvver alright me luvver alright me luvver. ",
    );
  });

  it.todo("selects from the full phrase catalog once selection behaviour changes");
});

// ---------------------------------------------------------------------------
// paragraph()
// ---------------------------------------------------------------------------

describe("paragraph", () => {
  it("returns a string", () => {
    const p = paragraph();
    assert.equal(typeof p, "string");
  });

  it("is not empty", () => {
    const p = paragraph();
    assert.ok(p.length > 0);
  });

  it("meets the minimum paragraph length", () => {
    const p = paragraph();
    assert.ok(
      p.length >= PARAGRAPH_LENGTH,
      `Expected length >= ${PARAGRAPH_LENGTH}, got ${p.length}`,
    );
  });

  it("only contains gurt words in gurt mode", () => {
    const p = paragraph(MODES.GURT);
    assert.ok(
      gurtCatalog.includesOnly(p),
      "Unexpected non-gurt content in paragraph",
    );
  });
});

// ---------------------------------------------------------------------------
// ipsum()
// ---------------------------------------------------------------------------

describe("ipsum", () => {
  it("returns an array", () => {
    const base = ipsum();
    assert.ok(Array.isArray(base));
  });

  it("returns 10 paragraphs by default", () => {
    const base = ipsum();
    assert.equal(base.length, 10);
  });

  it("returns the correct number of paragraphs", () => {
    const length = 13;
    const i = ipsum({ length });
    assert.equal(i.length, length);
  });

  it("returns an empty array when length is 0", () => {
    const i = ipsum({ length: 0 });
    assert.deepEqual(i, []);
  });

  it("first paragraph starts with the STARTER string", () => {
    const [firstParagraph] = ipsum();
    assert.ok(
      firstParagraph.startsWith(STARTER),
      `Expected paragraph to start with "${STARTER}"`,
    );
  });

  it("does not start with STARTER when startsWith is false", () => {
    const [firstParagraph] = ipsum({ startsWith: false });
    assert.equal(
      firstParagraph.startsWith(STARTER),
      false,
      "Expected first paragraph to NOT start with STARTER",
    );
  });

  it("only contains gurt words in gurt mode", () => {
    // Skip the first paragraph — it always contains the STARTER prefix
    // ("All right me luvver ipsum dolor sit amet") which is intentional
    const [, ...rest] = ipsum({ mode: MODES.GURT });
    for (const p of rest) {
      assert.ok(
        gurtCatalog.includesOnly(p),
        `Unexpected non-gurt content in paragraph: "${p}"`,
      );
    }
  });

  it("each paragraph is a non-empty string", () => {
    const i = ipsum({ length: 5 });
    for (const p of i) {
      assert.equal(typeof p, "string");
      assert.ok(p.length > 0);
    }
  });
});
