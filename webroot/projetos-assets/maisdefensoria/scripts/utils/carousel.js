const carouselItems = document.querySelectorAll(".carousel-item-group");

document.addEventListener("DOMContentLoaded", async function () {
  const reports = [
    {
      path: "data/reports/transparnciaativadoscritriosdeatendimentodasdefensorias.pdf",
      link: "https://www.transparencia.org.br/downloads/publicacoes/transparencia_ativa_criterios_defensorias.pdf",
    },
    {
      path: "data/reports/transparnciapassivadasdefensoriaspblicas.pdf",
      link: "https://www.transparencia.org.br/downloads/publicacoes/transparnciapassivadasdefensoriaspblicas.pdf",
    },
    {
      path: "data/reports/reavaliacao_transparencia_criterios_defensorias.pdf",
      link: "https://www.transparencia.org.br/downloads/publicacoes/reavaliacao_transparencia_criterios_defensorias.pdf",
    },
    {
      name: "Atendimento via LAI avança, mas ainda é desafio para Defensorias",
      path: "data/reports/reavaliaotransparnciapassivadasdefensorias.pdf",
      link: "https://www.transparencia.org.br/downloads/publicacoes/reavaliaotransparnciapassivadasdefensorias.pdf",
    },
  ];

  pdfjsLib.GlobalWorkerOptions.workerSrc =
    "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";

  if (reports.length !== carouselItems.length) {
    alert("O número de relatórios não corresponde ao número de containers.");
    console.error(
      "O número de relatórios não corresponde ao número de containers."
    );
    return;
  }

  carouselItems.forEach(async (container, index) => {
    container.addEventListener("click", () => {
      window.open(reports[index].link, "_blank");
    });
    const pdf = await pdfjsLib.getDocument(reports[index].path).promise;
    const metadata = await pdf.getMetadata();
    const title = reports[index].name || metadata.info.Title;
    const p = document.createElement("p");
    p.style.overflow = "hidden";
    p.style.textOverflow = "ellipsis";
    p.style.display = "-webkit-box";
    p.style.lineClamp = "2";
    p.style.webkitLineClamp = "2";
    p.style.webkitBoxOrient = "vertical";
    p.classList.add("body-2", "text-center", "white");
    p.textContent = `${title}`;
    container.prepend(p);

    const page = await pdf.getPage(1);
    const viewport = page.getViewport({ scale: 0.5 });
    const canvas = document.createElement("canvas");
    canvas.classList.add("carousel-img");
    canvas.width = viewport.width;
    canvas.height = viewport.height;
    container.prepend(canvas);

    const ctx = canvas.getContext("2d");
    const renderContext = { canvasContext: ctx, viewport: viewport };
    await page.render(renderContext).promise;
  });
});

carouselItems.forEach((item) => {
  item.addEventListener("mouseover", () => {
    item.style.opacity = "0.8";
  });

  item.addEventListener("mouseout", () => {
    item.style.opacity = "1";
  });
});
