function mastockinfo_copyToClipboard(elementId) {
    const fullText = document.getElementById(elementId).innerText;
    const textToCopy = fullText.split(': ')[1]; // Get the text after the colon
    navigator.clipboard.writeText(textToCopy).then(() => {
        alert('Ticker copied to clipboard: ' + textToCopy);
    }).catch(err => {
        console.error('Could not copy text: ', err);
    });
}