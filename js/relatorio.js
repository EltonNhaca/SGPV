document.getElementById("generate-pdf").addEventListener("click", () => {
    const content = document.getElementById("content"); // ID do elemento que deseja converter em PDF
    const pdfOptions = {
        margin: 10,
        filename: "relatorio_mensal.pdf", // Nome do arquivo PDF
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
    };

    html2pdf().from(content).set(pdfOptions).outputPdf((pdf) => {
        // Se desejar, você pode abrir o PDF em uma nova guia do navegador
        // pdf.output("datauristring");

        // Ou, se desejar, você pode fazer o download do PDF automaticamente
        pdf.save(pdfOptions.filename);
    });
});
