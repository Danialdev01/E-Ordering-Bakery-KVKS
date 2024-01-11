document.getElementById('addButton').addEventListener('click', function() {
    var bahanSelect = document.querySelector('select[name="id_bahan"]');
    var kuantitiInput = document.querySelector('input[name="kuantiti_bahan"]');
    var catatanInput = document.querySelector('input[name="catatan_bahan"]');
    var linkInput = document.querySelector('input[name="link_bahan"]');

    if (bahanSelect.value !== '0' && kuantitiInput.value !== '') {
        var bahanID = bahanSelect.value;
        var bahanName = bahanSelect.options[bahanSelect.selectedIndex].text;
        var bahanKuantiti = kuantitiInput.value;
        var catatanInputValue = catatanInput.value;
        var linkInputValue = linkInput.value;
        var bahanDetails = bahanName + ': ' + bahanKuantiti + " " + catatanInputValue;

        var displayDiv = document.createElement('div');
        displayDiv.className = 'bahan-div'
        displayDiv.textContent = bahanDetails;

        var removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.className = 'remove-button';
        removeButton.addEventListener('click', function() {
        displayDiv.remove();
        removeButton.remove();


        // Update the hidden input value
        document.getElementById('hiddenInput').value = document.getElementById('hiddenInput').value.replace(bahanID + ':' + bahanKuantiti + ', ', '');
        });


        displayDiv.appendChild(removeButton);
        document.getElementById('displayDivContainer').appendChild(displayDiv);

        // Update the hidden input value
        document.getElementById('hiddenInput').value += bahanID + '/::/' + bahanKuantiti + '/||/' + catatanInputValue + '/||/' + linkInputValue + ', ';
    }
    kuantitiInput.value = '';
    catatanInput.value = '';
    linkInput.value = '';

    var element = document.getElementById( Id_of_required_form ).element.reset()
});