import { FILLER, GURT } from "./lib/constants";

export type IpsumParams = {
  mode?: typeof FILLER | typeof GURT;
  length?: number;
  startsWith?: boolean;
};
