export class AgendamentoPorCidade extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.shadowRoot.innerHTML = `
        <div
        id="wasvpeawso"
        style="
            padding-left: 0px;
            padding-right: 0px;
            padding-top: 0px;
            padding-bottom: 0px;
            overflow-x: auto;
            overflow-y: auto;
            width: auto;
            height: auto;
        "
>
  <style>
    #wasvpeawso table {
      font-family: "Nunito", system-ui, "Segoe UI", Roboto, Helvetica, Arial,
        sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
        "Noto Color Emoji";
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    #wasvpeawso thead,
    #wasvpeawso tbody,
    #wasvpeawso tfoot,
    #wasvpeawso tr,
    #wasvpeawso td,
    #wasvpeawso th {
      border-style: none;
    }

    #wasvpeawso p {
      margin: 0;
      padding: 0;
    }

    #wasvpeawso .gt_table {
      display: table;
      border-collapse: collapse;
      line-height: normal;
      margin-left: auto;
      margin-right: auto;
      color: #333333;
      font-size: 16px;
      font-weight: normal;
      font-style: normal;
      background-color: #ffffff;
      width: auto;
      border-top-style: solid;
      border-top-width: 2px;
      border-top-color: #a8a8a8;
      border-right-style: none;
      border-right-width: 2px;
      border-right-color: #d3d3d3;
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #a8a8a8;
      border-left-style: none;
      border-left-width: 2px;
      border-left-color: #d3d3d3;
    }

    #wasvpeawso .gt_caption {
      padding-top: 4px;
      padding-bottom: 4px;
    }

    #wasvpeawso .gt_title {
      color: #333333;
      font-size: 125%;
      font-weight: initial;
      padding-top: 4px;
      padding-bottom: 4px;
      padding-left: 5px;
      padding-right: 5px;
      border-bottom-color: #ffffff;
      border-bottom-width: 0;
    }

    #wasvpeawso .gt_subtitle {
      color: #333333;
      font-size: 85%;
      font-weight: initial;
      padding-top: 3px;
      padding-bottom: 5px;
      padding-left: 5px;
      padding-right: 5px;
      border-top-color: #ffffff;
      border-top-width: 0;
    }

    #wasvpeawso .gt_heading {
      background-color: #ffffff;
      text-align: center;
      border-bottom-color: #ffffff;
      border-left-style: none;
      border-left-width: 1px;
      border-left-color: #d3d3d3;
      border-right-style: none;
      border-right-width: 1px;
      border-right-color: #d3d3d3;
    }

    #wasvpeawso .gt_bottom_border {
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
    }

    #wasvpeawso .gt_col_headings {
      border-top-style: solid;
      border-top-width: 2px;
      border-top-color: #d3d3d3;
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
      border-left-style: none;
      border-left-width: 1px;
      border-left-color: #d3d3d3;
      border-right-style: none;
      border-right-width: 1px;
      border-right-color: #d3d3d3;
    }

    #wasvpeawso .gt_col_heading {
      color: #333333;
      background-color: #ffffff;
      font-size: 100%;
      font-weight: normal;
      text-transform: inherit;
      border-left-style: none;
      border-left-width: 1px;
      border-left-color: #d3d3d3;
      border-right-style: none;
      border-right-width: 1px;
      border-right-color: #d3d3d3;
      vertical-align: bottom;
      padding-top: 5px;
      padding-bottom: 6px;
      padding-left: 5px;
      padding-right: 5px;
      overflow-x: hidden;
    }

    #wasvpeawso .gt_column_spanner_outer {
      color: #333333;
      background-color: #ffffff;
      font-size: 100%;
      font-weight: normal;
      text-transform: inherit;
      padding-top: 0;
      padding-bottom: 0;
      padding-left: 4px;
      padding-right: 4px;
    }

    #wasvpeawso .gt_column_spanner_outer:first-child {
      padding-left: 0;
    }

    #wasvpeawso .gt_column_spanner_outer:last-child {
      padding-right: 0;
    }

    #wasvpeawso .gt_column_spanner {
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
      vertical-align: bottom;
      padding-top: 5px;
      padding-bottom: 5px;
      overflow-x: hidden;
      display: inline-block;
      width: 100%;
    }

    #wasvpeawso .gt_spanner_row {
      border-bottom-style: hidden;
    }

    #wasvpeawso .gt_group_heading {
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 5px;
      padding-right: 5px;
      color: #333333;
      background-color: #ffffff;
      font-size: 100%;
      font-weight: initial;
      text-transform: inherit;
      border-top-style: solid;
      border-top-width: 2px;
      border-top-color: #d3d3d3;
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
      border-left-style: none;
      border-left-width: 1px;
      border-left-color: #d3d3d3;
      border-right-style: none;
      border-right-width: 1px;
      border-right-color: #d3d3d3;
      vertical-align: middle;
      text-align: left;
    }

    #wasvpeawso .gt_empty_group_heading {
      padding: 0.5px;
      color: #333333;
      background-color: #ffffff;
      font-size: 100%;
      font-weight: initial;
      border-top-style: solid;
      border-top-width: 2px;
      border-top-color: #d3d3d3;
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
      vertical-align: middle;
    }

    #wasvpeawso .gt_from_md > :first-child {
      margin-top: 0;
    }

    #wasvpeawso .gt_from_md > :last-child {
      margin-bottom: 0;
    }

    #wasvpeawso .gt_row {
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 5px;
      padding-right: 5px;
      margin: 10px;
      border-top-style: solid;
      border-top-width: 1px;
      border-top-color: #d3d3d3;
      border-left-style: none;
      border-left-width: 1px;
      border-left-color: #d3d3d3;
      border-right-style: none;
      border-right-width: 1px;
      border-right-color: #d3d3d3;
      vertical-align: middle;
      overflow-x: hidden;
    }

    #wasvpeawso .gt_stub {
      color: #333333;
      background-color: #ffffff;
      font-size: 100%;
      font-weight: initial;
      text-transform: inherit;
      border-right-style: solid;
      border-right-width: 2px;
      border-right-color: #d3d3d3;
      padding-left: 5px;
      padding-right: 5px;
    }

    #wasvpeawso .gt_stub_row_group {
      color: #333333;
      background-color: #ffffff;
      font-size: 100%;
      font-weight: initial;
      text-transform: inherit;
      border-right-style: solid;
      border-right-width: 2px;
      border-right-color: #d3d3d3;
      padding-left: 5px;
      padding-right: 5px;
      vertical-align: top;
    }

    #wasvpeawso .gt_row_group_first td {
      border-top-width: 2px;
    }

    #wasvpeawso .gt_row_group_first th {
      border-top-width: 2px;
    }

    #wasvpeawso .gt_summary_row {
      color: #333333;
      background-color: #ffffff;
      text-transform: inherit;
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 5px;
      padding-right: 5px;
    }

    #wasvpeawso .gt_first_summary_row {
      border-top-style: solid;
      border-top-color: #d3d3d3;
    }

    #wasvpeawso .gt_first_summary_row.thick {
      border-top-width: 2px;
    }

    #wasvpeawso .gt_last_summary_row {
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 5px;
      padding-right: 5px;
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
    }

    #wasvpeawso .gt_grand_summary_row {
      color: #333333;
      background-color: #ffffff;
      text-transform: inherit;
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 5px;
      padding-right: 5px;
    }

    #wasvpeawso .gt_first_grand_summary_row {
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 5px;
      padding-right: 5px;
      border-top-style: double;
      border-top-width: 6px;
      border-top-color: #d3d3d3;
    }

    #wasvpeawso .gt_last_grand_summary_row_top {
      padding-top: 8px;
      padding-bottom: 8px;
      padding-left: 5px;
      padding-right: 5px;
      border-bottom-style: double;
      border-bottom-width: 6px;
      border-bottom-color: #d3d3d3;
    }

    #wasvpeawso .gt_striped {
      background-color: rgba(128, 128, 128, 0.05);
    }

    #wasvpeawso .gt_table_body {
      border-top-style: solid;
      border-top-width: 2px;
      border-top-color: #d3d3d3;
      border-bottom-style: solid;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
    }

    #wasvpeawso .gt_footnotes {
      color: #333333;
      background-color: #ffffff;
      border-bottom-style: none;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
      border-left-style: none;
      border-left-width: 2px;
      border-left-color: #d3d3d3;
      border-right-style: none;
      border-right-width: 2px;
      border-right-color: #d3d3d3;
    }

    #wasvpeawso .gt_footnote {
      margin: 0px;
      font-size: 90%;
      padding-top: 4px;
      padding-bottom: 4px;
      padding-left: 5px;
      padding-right: 5px;
    }

    #wasvpeawso .gt_sourcenotes {
      color: #333333;
      background-color: #ffffff;
      border-bottom-style: none;
      border-bottom-width: 2px;
      border-bottom-color: #d3d3d3;
      border-left-style: none;
      border-left-width: 2px;
      border-left-color: #d3d3d3;
      border-right-style: none;
      border-right-width: 2px;
      border-right-color: #d3d3d3;
    }

    #wasvpeawso .gt_sourcenote {
      font-size: 90%;
      padding-top: 4px;
      padding-bottom: 4px;
      padding-left: 5px;
      padding-right: 5px;
    }

    #wasvpeawso .gt_left {
      text-align: left;
    }

    #wasvpeawso .gt_center {
      text-align: center;
    }

    #wasvpeawso .gt_right {
      text-align: right;
      font-variant-numeric: tabular-nums;
    }

    #wasvpeawso .gt_font_normal {
      font-weight: normal;
    }

    #wasvpeawso .gt_font_bold {
      font-weight: bold;
    }

    #wasvpeawso .gt_font_italic {
      font-style: italic;
    }

    #wasvpeawso .gt_super {
      font-size: 65%;
    }

    #wasvpeawso .gt_footnote_marks {
      font-size: 75%;
      vertical-align: 0.4em;
      position: initial;
    }

    #wasvpeawso .gt_asterisk {
      font-size: 100%;
      vertical-align: 0;
    }

    #wasvpeawso .gt_indent_1 {
      text-indent: 5px;
    }

    #wasvpeawso .gt_indent_2 {
      text-indent: 10px;
    }

    #wasvpeawso .gt_indent_3 {
      text-indent: 15px;
    }

    #wasvpeawso .gt_indent_4 {
      text-indent: 20px;
    }

    #wasvpeawso .gt_indent_5 {
      text-indent: 25px;
    }

    #wasvpeawso .katex-display {
      display: inline-flex !important;
      margin-bottom: 0.75em !important;
    }

    #wasvpeawso
      div.Reactable
      > div.rt-table
      > div.rt-thead
      > div.rt-tr.rt-tr-group-header
      > div.rt-th-group:after {
      height: 0px !important;
    }
  </style>
  <table
    class="gt_table"
    data-quarto-disable-processing="false"
    data-quarto-bootstrap="false"
  >
    <thead>
      <tr class="gt_heading">
        <td
          colspan="4"
          class="gt_heading gt_title gt_font_normal gt_bottom_border"
          style
        >
          Total de Agendamentos por Cidade (Top 5)
        </td>
      </tr>

      <tr class="gt_col_headings">
        <th
          class="gt_col_heading gt_columns_bottom_border gt_left"
          rowspan="1"
          colspan="1"
          style="font-weight: bold"
          scope="col"
          id="Estado"
        >
          Estado
        </th>
        <th
          class="gt_col_heading gt_columns_bottom_border gt_left"
          rowspan="1"
          colspan="1"
          style="font-weight: bold"
          scope="col"
          id="Cidade"
        >
          Cidade
        </th>
        <th
          class="gt_col_heading gt_columns_bottom_border gt_right"
          rowspan="1"
          colspan="1"
          style="font-weight: bold"
          scope="col"
          id="Total de agendamentos"
        >
          Total de agendamentos
        </th>
        <th
          class="gt_col_heading gt_columns_bottom_border gt_right"
          rowspan="1"
          colspan="1"
          style="font-weight: bold"
          scope="col"
          id="Proporção"
        >
          Proporção
        </th>
      </tr>
    </thead>
    <tbody class="gt_table_body">
      <tr>
        <td headers="Estado" class="gt_row gt_left">São Paulo</td>
        <td headers="Cidade" class="gt_row gt_left">São Paulo</td>
        <td headers="Total de agendamentos" class="gt_row gt_right">471.772</td>
        <td headers="Proporção" class="gt_row gt_right">35,64%</td>
      </tr>
      <tr>
        <td headers="Estado" class="gt_row gt_left">Sem informação</td>
        <td headers="Cidade" class="gt_row gt_left">Sem informação</td>
        <td headers="Total de agendamentos" class="gt_row gt_right">83.025</td>
        <td headers="Proporção" class="gt_row gt_right">6,27%</td>
      </tr>
      <tr>
        <td headers="Estado" class="gt_row gt_left">São Paulo</td>
        <td headers="Cidade" class="gt_row gt_left">Guarulhos</td>
        <td headers="Total de agendamentos" class="gt_row gt_right">47.460</td>
        <td headers="Proporção" class="gt_row gt_right">3,59%</td>
      </tr>
      <tr>
        <td headers="Estado" class="gt_row gt_left">São Paulo</td>
        <td headers="Cidade" class="gt_row gt_left">Campinas</td>
        <td headers="Total de agendamentos" class="gt_row gt_right">45.167</td>
        <td headers="Proporção" class="gt_row gt_right">3,41%</td>
      </tr>
      <tr>
        <td headers="Estado" class="gt_row gt_left">São Paulo</td>
        <td headers="Cidade" class="gt_row gt_left">São José dos Campos</td>
        <td headers="Total de agendamentos" class="gt_row gt_right">27.346</td>
        <td headers="Proporção" class="gt_row gt_right">2,07%</td>
      </tr>
    </tbody>
  </table>
</div>
`;
  }
}
