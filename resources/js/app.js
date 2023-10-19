import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import {
    Sidenav,
    Modal,
    Ripple,
    Chart,
    Datatable,
    initTE,
} from "tw-elements";

initTE({ Sidenav, Modal, Ripple, Chart, Datatable, });

const sidenav = document.getElementById("full-screen-example");
const sidenavInstance = Sidenav.getInstance(sidenav);

let innerWidth = null;

const setMode = (e) => {
    // Check necessary for Android devices
    if (window.innerWidth === innerWidth) {
        return;
    }

    innerWidth = window.innerWidth;

    if (window.innerWidth < sidenavInstance.getBreakpoint("sm")) {
        sidenavInstance.changeMode("over");
        sidenavInstance.hide();
    } else {
        sidenavInstance.changeMode("side");
        sidenavInstance.show();
    }
};

if (window.innerWidth < sidenavInstance.getBreakpoint("sm")) {
    setMode();
}

// Event listeners
window.addEventListener("resize", setMode);

const datatableSearchInput = document.getElementById('datatable-search-input');

if (datatableSearchInput) {
    datatableSearchInput.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#datatable table tbody tr');

        rows.forEach(function (row) {
            const columns = row.getElementsByTagName('td');
            let found = false;

            for (let i = 0; i < columns.length; i++) {
                const cell = columns[i];
                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    found = true;
                    break;
                }
            }

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}








