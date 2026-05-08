export type Mode = "filler" | "gurt";

export type IpsumParams = {
  mode?: Mode;
  length?: number;
  startsWith?: boolean;
};
