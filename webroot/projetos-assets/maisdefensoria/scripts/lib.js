import { AgendamentoPorCidade } from "./components/agendamentos-por-cidade.js";
import { AgendamentoPorLocalDeAtendimento } from "./components/agendamento-por-local-de-atendimento.js";
import { AvaliacoesPorCidade } from "./components/avaliacoes-por-cidade.js";

import { ShapeDividerTop } from "./components/shape-divider-top.js";
import { ShapeDividerBottom } from "./components/shape-divider-bottom.js";

// Tables
customElements.define("agendamento-por-cidade", AgendamentoPorCidade);
customElements.define(
  "agendamento-por-local-de-atendimento",
  AgendamentoPorLocalDeAtendimento
);
customElements.define("avaliacoes-por-cidade", AvaliacoesPorCidade);

// Shape Dividers
customElements.define("shape-divider-top", ShapeDividerTop);
customElements.define("shape-divider-bottom", ShapeDividerBottom);
