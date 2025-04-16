import gurt from "./gurt";
import filler from "./filler";
import { IpsumParams } from "../types";
import { MODES, PARAGRAPH_LENGTH } from "./constants";

type Mode = IpsumParams["mode"];

function getWords(mode: Mode): Array<string> {
  if (mode === MODES.GURT) {
    return gurt;
  }

  return [...gurt, ...filler].sort(() => 0.5 - Math.random());
}

function sentence(mode: Mode = MODES.FILLER): string {
  const words = getWords(mode);
  let sentence: string = "";
  const length: number = Math.floor(5 + 10 * Math.random());

  for (let i = 0; i < length; i++) {
    let wordIndex: number = Math.floor(Math.random() * (words.length - 1));
    if (i === 0) {
      sentence =
        words[wordIndex][0].toUpperCase() +
        words[wordIndex].substring(1, words[wordIndex].length) +
        " ";
    } else if (i === length - 1) {
      sentence = sentence + words[wordIndex] + "." + " ";
    } else {
      sentence = sentence + words[wordIndex] + " ";
    }
  }

  return sentence;
}

function paragraph(mode: Mode = MODES.FILLER): string {
  let paragraph: string = "";
  const length: number = PARAGRAPH_LENGTH;

  while (paragraph.length <= length) {
    paragraph += sentence(mode);
  }

  return paragraph;
}

function ipsum(params: Partial<IpsumParams> = {}): Array<string> {
  const mode = params.mode ?? "filler";
  const length = params.length ?? 10;
  const startsWith = params.startsWith ?? true;
  const text: string[] = [];

  if (length > 0) {
    for (let j = 0; j < length; j++) {
      if (j === 0 && startsWith) {
        const p = paragraph(mode);

        text.push(
          `All right me luvver ipsum dolor sit amet ${
            p[0].toLowerCase() + p.slice(1)
          }`,
        );
      } else {
        text.push(paragraph(mode));
      }
    }
  }

  return text;
}

export { sentence, paragraph, ipsum };
