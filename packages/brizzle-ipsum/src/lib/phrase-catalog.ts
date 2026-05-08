import type { Mode } from "../types";
import filler from "./filler";
import gurt from "./gurt";
import { MODES } from "./constants";

type PhraseCatalog = {
  phrases: readonly string[];
  includesOnly(text: string): boolean;
};

function normalise(text: string): string {
  return text
    .toLowerCase()
    .replace(/[^a-z\s]/g, "")
    .trim();
}

function createCatalog(phrases: readonly string[]): PhraseCatalog {
  const normalisedPhrases = [...phrases]
    .map(normalise)
    .sort((a, b) => b.length - a.length);

  return {
    phrases,
    includesOnly(text: string): boolean {
      let remaining = normalise(text);
      let lastLength = -1;

      while (remaining.length > 0) {
        if (remaining.length === lastLength) {
          return false;
        }

        lastLength = remaining.length;

        for (const phrase of normalisedPhrases) {
          if (remaining.startsWith(phrase)) {
            remaining = remaining.slice(phrase.length).trimStart();
            break;
          }
        }
      }

      return true;
    },
  };
}

const catalogs: Record<Mode, PhraseCatalog> = {
  [MODES.FILLER]: createCatalog([...gurt, ...filler]),
  [MODES.GURT]: createCatalog(gurt),
};

function getPhraseCatalog(mode: Mode): PhraseCatalog {
  return catalogs[mode];
}

export { getPhraseCatalog };
export type { PhraseCatalog };
