import { MODES } from "./lib/constants";

export type IpsumParams = {
  mode?: typeof MODES.FILLER | typeof MODES.GURT;
  length?: number;
  startsWith?: boolean;
};
