export class AgendamentoPorLocalDeAtendimento extends HTMLElement {
  constructor() {
    super();
    this._shadowRoot = this.attachShadow({ mode: "open" });
    this._shadowRoot.innerHTML = `
        <div id="tyrdqlzdls" style="padding-left:0px;padding-right:0px;padding-top:10px;padding-bottom:10px;overflow-x:auto;overflow-y:auto;width:auto;height:auto;">
        <style>
        #tyrdqlzdls table {
        font-family: "Nunito", system-ui, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        }

        #tyrdqlzdls thead, #tyrdqlzdls tbody, #tyrdqlzdls tfoot, #tyrdqlzdls tr, #tyrdqlzdls td, #tyrdqlzdls th {
        border-style: none;
        }

        #tyrdqlzdls p {
        margin: 0;
        padding: 0;
        }

        #tyrdqlzdls .gt_table {
        display: table;
        border-collapse: collapse;
        line-height: normal;
        margin-left: auto;
        margin-right: auto;
        color: #333333;
        font-size: 16px;
        font-weight: normal;
        font-style: normal;
        background-color: #FFFFFF;
        width: auto;
        border-top-style: solid;
        border-top-width: 2px;
        border-top-color: #A8A8A8;
        border-right-style: none;
        border-right-width: 2px;
        border-right-color: #D3D3D3;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #A8A8A8;
        border-left-style: none;
        border-left-width: 2px;
        border-left-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_caption {
        padding-top: 4px;
        padding-bottom: 4px;
        }

        #tyrdqlzdls .gt_title {
        color: #333333;
        font-size: 125%;
        font-weight: initial;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        padding-right: 5px;
        border-bottom-color: #FFFFFF;
        border-bottom-width: 0;
        }

        #tyrdqlzdls .gt_subtitle {
        color: #333333;
        font-size: 85%;
        font-weight: initial;
        padding-top: 3px;
        padding-bottom: 5px;
        padding-left: 5px;
        padding-right: 5px;
        border-top-color: #FFFFFF;
        border-top-width: 0;
        }

        #tyrdqlzdls .gt_heading {
        background-color: #FFFFFF;
        text-align: center;
        border-bottom-color: #FFFFFF;
        border-left-style: none;
        border-left-width: 1px;
        border-left-color: #D3D3D3;
        border-right-style: none;
        border-right-width: 1px;
        border-right-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_bottom_border {
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_col_headings {
        border-top-style: solid;
        border-top-width: 2px;
        border-top-color: #D3D3D3;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        border-left-style: none;
        border-left-width: 1px;
        border-left-color: #D3D3D3;
        border-right-style: none;
        border-right-width: 1px;
        border-right-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_col_heading {
        color: #333333;
        background-color: #FFFFFF;
        font-size: 100%;
        font-weight: normal;
        text-transform: inherit;
        border-left-style: none;
        border-left-width: 1px;
        border-left-color: #D3D3D3;
        border-right-style: none;
        border-right-width: 1px;
        border-right-color: #D3D3D3;
        vertical-align: bottom;
        padding-top: 5px;
        padding-bottom: 6px;
        padding-left: 5px;
        padding-right: 5px;
        overflow-x: hidden;
        }

        #tyrdqlzdls .gt_column_spanner_outer {
        color: #333333;
        background-color: #FFFFFF;
        font-size: 100%;
        font-weight: normal;
        text-transform: inherit;
        padding-top: 0;
        padding-bottom: 0;
        padding-left: 4px;
        padding-right: 4px;
        }

        #tyrdqlzdls .gt_column_spanner_outer:first-child {
        padding-left: 0;
        }

        #tyrdqlzdls .gt_column_spanner_outer:last-child {
        padding-right: 0;
        }

        #tyrdqlzdls .gt_column_spanner {
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        vertical-align: bottom;
        padding-top: 5px;
        padding-bottom: 5px;
        overflow-x: hidden;
        display: inline-block;
        width: 100%;
        }

        #tyrdqlzdls .gt_spanner_row {
        border-bottom-style: hidden;
        }

        #tyrdqlzdls .gt_group_heading {
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 5px;
        padding-right: 5px;
        color: #333333;
        background-color: #FFFFFF;
        font-size: 100%;
        font-weight: initial;
        text-transform: inherit;
        border-top-style: solid;
        border-top-width: 2px;
        border-top-color: #D3D3D3;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        border-left-style: none;
        border-left-width: 1px;
        border-left-color: #D3D3D3;
        border-right-style: none;
        border-right-width: 1px;
        border-right-color: #D3D3D3;
        vertical-align: middle;
        text-align: left;
        }

        #tyrdqlzdls .gt_empty_group_heading {
        padding: 0.5px;
        color: #333333;
        background-color: #FFFFFF;
        font-size: 100%;
        font-weight: initial;
        border-top-style: solid;
        border-top-width: 2px;
        border-top-color: #D3D3D3;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        vertical-align: middle;
        }

        #tyrdqlzdls .gt_from_md > :first-child {
        margin-top: 0;
        }

        #tyrdqlzdls .gt_from_md > :last-child {
        margin-bottom: 0;
        }

        #tyrdqlzdls .gt_row {
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 5px;
        padding-right: 5px;
        margin: 10px;
        border-top-style: solid;
        border-top-width: 1px;
        border-top-color: #D3D3D3;
        border-left-style: none;
        border-left-width: 1px;
        border-left-color: #D3D3D3;
        border-right-style: none;
        border-right-width: 1px;
        border-right-color: #D3D3D3;
        vertical-align: middle;
        overflow-x: hidden;
        }

        #tyrdqlzdls .gt_stub {
        color: #333333;
        background-color: #FFFFFF;
        font-size: 100%;
        font-weight: initial;
        text-transform: inherit;
        border-right-style: solid;
        border-right-width: 2px;
        border-right-color: #D3D3D3;
        padding-left: 5px;
        padding-right: 5px;
        }

        #tyrdqlzdls .gt_stub_row_group {
        color: #333333;
        background-color: #FFFFFF;
        font-size: 100%;
        font-weight: initial;
        text-transform: inherit;
        border-right-style: solid;
        border-right-width: 2px;
        border-right-color: #D3D3D3;
        padding-left: 5px;
        padding-right: 5px;
        vertical-align: top;
        }

        #tyrdqlzdls .gt_row_group_first td {
        border-top-width: 2px;
        }

        #tyrdqlzdls .gt_row_group_first th {
        border-top-width: 2px;
        }

        #tyrdqlzdls .gt_summary_row {
        color: #333333;
        background-color: #FFFFFF;
        text-transform: inherit;
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 5px;
        padding-right: 5px;
        }

        #tyrdqlzdls .gt_first_summary_row {
        border-top-style: solid;
        border-top-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_first_summary_row.thick {
        border-top-width: 2px;
        }

        #tyrdqlzdls .gt_last_summary_row {
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 5px;
        padding-right: 5px;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_grand_summary_row {
        color: #333333;
        background-color: #FFFFFF;
        text-transform: inherit;
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 5px;
        padding-right: 5px;
        }

        #tyrdqlzdls .gt_first_grand_summary_row {
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 5px;
        padding-right: 5px;
        border-top-style: double;
        border-top-width: 6px;
        border-top-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_last_grand_summary_row_top {
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 5px;
        padding-right: 5px;
        border-bottom-style: double;
        border-bottom-width: 6px;
        border-bottom-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_striped {
        background-color: rgba(128, 128, 128, 0.05);
        }

        #tyrdqlzdls .gt_table_body {
        border-top-style: solid;
        border-top-width: 2px;
        border-top-color: #D3D3D3;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_footnotes {
        color: #333333;
        background-color: #FFFFFF;
        border-bottom-style: none;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        border-left-style: none;
        border-left-width: 2px;
        border-left-color: #D3D3D3;
        border-right-style: none;
        border-right-width: 2px;
        border-right-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_footnote {
        margin: 0px;
        font-size: 90%;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        padding-right: 5px;
        }

        #tyrdqlzdls .gt_sourcenotes {
        color: #333333;
        background-color: #FFFFFF;
        border-bottom-style: none;
        border-bottom-width: 2px;
        border-bottom-color: #D3D3D3;
        border-left-style: none;
        border-left-width: 2px;
        border-left-color: #D3D3D3;
        border-right-style: none;
        border-right-width: 2px;
        border-right-color: #D3D3D3;
        }

        #tyrdqlzdls .gt_sourcenote {
        font-size: 90%;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        padding-right: 5px;
        }

        #tyrdqlzdls .gt_left {
        text-align: left;
        }

        #tyrdqlzdls .gt_center {
        text-align: center;
        }

        #tyrdqlzdls .gt_right {
        text-align: right;
        font-variant-numeric: tabular-nums;
        }

        #tyrdqlzdls .gt_font_normal {
        font-weight: normal;
        }

        #tyrdqlzdls .gt_font_bold {
        font-weight: bold;
        }

        #tyrdqlzdls .gt_font_italic {
        font-style: italic;
        }

        #tyrdqlzdls .gt_super {
        font-size: 65%;
        }

        #tyrdqlzdls .gt_footnote_marks {
        font-size: 75%;
        vertical-align: 0.4em;
        position: initial;
        }

        #tyrdqlzdls .gt_asterisk {
        font-size: 100%;
        vertical-align: 0;
        }

        #tyrdqlzdls .gt_indent_1 {
        text-indent: 5px;
        }

        #tyrdqlzdls .gt_indent_2 {
        text-indent: 10px;
        }

        #tyrdqlzdls .gt_indent_3 {
        text-indent: 15px;
        }

        #tyrdqlzdls .gt_indent_4 {
        text-indent: 20px;
        }

        #tyrdqlzdls .gt_indent_5 {
        text-indent: 25px;
        }

        #tyrdqlzdls .katex-display {
        display: inline-flex !important;
        margin-bottom: 0.75em !important;
        }

        #tyrdqlzdls div.Reactable > div.rt-table > div.rt-thead > div.rt-tr.rt-tr-group-header > div.rt-th-group:after {
        height: 0px !important;
        }
        </style>
        <table class="gt_table" data-quarto-disable-processing="false" data-quarto-bootstrap="false">
        <thead>
            <tr class="gt_heading">
            <td colspan="3" class="gt_heading gt_title gt_font_normal gt_bottom_border" style>Total de Agendamentos por Local de Atendimento (Top 5)</td>
            </tr>
            
            <tr class="gt_col_headings">
            <th class="gt_col_heading gt_columns_bottom_border gt_left" rowspan="1" colspan="1" style="font-weight: bold;" scope="col" id="Local de atendimento">Local de atendimento</th>
            <th class="gt_col_heading gt_columns_bottom_border gt_right" rowspan="1" colspan="1" style="font-weight: bold;" scope="col" id="Total de agendamentos">Total de agendamentos</th>
            <th class="gt_col_heading gt_columns_bottom_border gt_right" rowspan="1" colspan="1" style="font-weight: bold;" scope="col" id="Proporção">Proporção</th>
            </tr>
        </thead>
        <tbody class="gt_table_body">
            <tr><td headers="Local de atendimento" class="gt_row gt_left">DIVISÃO DE ATENDIMENTO INICIAL ESPECIALIZADO AO PÚBLICO</td>
        <td headers="Total de agendamentos" class="gt_row gt_right">194.629</td>
        <td headers="Proporção" class="gt_row gt_right">14,70%</td></tr>
            <tr><td headers="Local de atendimento" class="gt_row gt_left">UNIDADE GUARULHOS</td>
        <td headers="Total de agendamentos" class="gt_row gt_right"> 52.639</td>
        <td headers="Proporção" class="gt_row gt_right"> 3,98%</td></tr>
            <tr><td headers="Local de atendimento" class="gt_row gt_left">UNIDADE SANTO AMARO</td>
        <td headers="Total de agendamentos" class="gt_row gt_right"> 50.052</td>
        <td headers="Proporção" class="gt_row gt_right"> 3,78%</td></tr>
            <tr><td headers="Local de atendimento" class="gt_row gt_left">UNIDADE CAMPINAS</td>
        <td headers="Total de agendamentos" class="gt_row gt_right"> 33.898</td>
        <td headers="Proporção" class="gt_row gt_right"> 2,56%</td></tr>
            <tr><td headers="Local de atendimento" class="gt_row gt_left">UNIDADE MOGI DAS CRUZES</td>
        <td headers="Total de agendamentos" class="gt_row gt_right"> 32.795</td>
        <td headers="Proporção" class="gt_row gt_right"> 2,48%</td></tr>
        </tbody>
        
        
        </table>
        </div>
    `;
  }
}
