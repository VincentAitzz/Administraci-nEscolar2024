function limpiarCampos() {
    const selects = document.querySelectorAll('select');
    const inputs = document.querySelectorAll('input');
    
    inputs.forEach(input => {
        if (input.type === 'text') {
            input.value = ''; // Establece el valor vacío para los inputs de texto
        } else if (input.type === 'checkbox') {
            input.checked = false; // Desmarca los checkboxes
        }
    });
    selects.forEach(select => {
        select.selectedIndex = 0; // Establece el índice seleccionado en 0 (primera opción)
    });
}
