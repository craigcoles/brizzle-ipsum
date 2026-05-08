import type { IpsumParams, Mode } from "../types";
import { MODES, PARAGRAPH_LENGTH, STARTER } from "./constants";
import { getPhraseCatalog, type PhraseCatalog } from "./phrase-catalog";

type RandomSource = {
  next(): number;
};

type GeneratePassageParams = {
  catalog: PhraseCatalog;
  length: number;
  startsWith: boolean;
  random?: RandomSource;
};

const mathRandom: RandomSource = {
  next: Math.random,
};

function pickPhrase(
  phrases: readonly string[],
  random: RandomSource = mathRandom,
): string {
  const phraseIndex = Math.floor(random.next() * (phrases.length - 1));

  return phrases[phraseIndex];
}

function formatSentence(phrases: readonly string[]): string {
  const [firstPhrase, ...rest] = phrases;
  const capitalisedFirstPhrase =
    firstPhrase[0].toUpperCase() + firstPhrase.substring(1, firstPhrase.length);

  return `${[capitalisedFirstPhrase, ...rest].join(" ")}. `;
}

function generateSentence(
  catalog: PhraseCatalog,
  random: RandomSource = mathRandom,
): string {
  const phrases: string[] = [];
  const length: number = Math.floor(5 + 10 * random.next());

  for (let i = 0; i < length; i++) {
    phrases.push(pickPhrase(catalog.phrases, random));
  }

  return formatSentence(phrases);
}

function generateParagraph(
  catalog: PhraseCatalog,
  random: RandomSource = mathRandom,
): string {
  let paragraph: string = "";
  const length: number = PARAGRAPH_LENGTH;

  while (paragraph.length <= length) {
    paragraph += generateSentence(catalog, random);
  }

  return paragraph;
}

function generatePassage({
  catalog,
  length,
  startsWith,
  random = mathRandom,
}: GeneratePassageParams): Array<string> {
  const text: string[] = [];

  if (length > 0) {
    for (let j = 0; j < length; j++) {
      if (j === 0 && startsWith) {
        const p = generateParagraph(catalog, random);

        text.push(`${STARTER} ${p[0].toLowerCase() + p.slice(1)}`);
      } else {
        text.push(generateParagraph(catalog, random));
      }
    }
  }

  return text;
}

function sentence(mode: Mode = MODES.FILLER): string {
  return generateSentence(getPhraseCatalog(mode));
}

function paragraph(mode: Mode = MODES.FILLER): string {
  return generateParagraph(getPhraseCatalog(mode));
}

function ipsum(params: Partial<IpsumParams> = {}): Array<string> {
  const mode = params.mode ?? MODES.FILLER;
  const length = params.length ?? 10;
  const startsWith = params.startsWith ?? true;
  const catalog = getPhraseCatalog(mode);

  return generatePassage({ catalog, length, startsWith });
}

export { sentence, paragraph, ipsum, generateSentence, generateParagraph };
