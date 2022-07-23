var player = 2;
var player = 1;


const x = (i, j) => {

    if (player == 2) {
        player = 1;
        document.getElementById('X').style.display = '';
        document.getElementById('O').style.display = 'none';
        document.getElementById('xo' + i + j).value = 'O';
        document.getElementById('xo' + i + j).style.fontSize = '35px';
        document.getElementById('xo' + i + j).style.background = '#99ccff';
        document.getElementById('xo' + i + j).disabled = true;
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "server.php?i=" + i + "&&j=" + j + "&&p=O");
        xmlhttp.send();

    } else {
        player = 2;
        document.getElementById('O').style.display = '';
        document.getElementById('X').style.display = 'none';
        document.getElementById('xo' + i + j).value = 'X';
        document.getElementById('xo' + i + j).style.fontSize = '35px';
        document.getElementById('xo' + i + j).style.background = '#ff99cc';
        document.getElementById('xo' + i + j).disabled = true;
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function () {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "server.php?i=" + i + "&&j=" + j + "&&p=X");
        xmlhttp.send();
    }
    console.log(i, j);

}

const replay = () => {
    Swal.fire({
        title: 'คุณต้องการดู replay หรือไม่?',
        text: "",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#34db5c',
        cancelButtonColor: '#db3434',
        confirmButtonText: 'ต้องการ',
        cancelButtonText: 'ไม่ต้องการ'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'replay.php';

        } else {
            window.location.href = 'x-o_game.php';


        }

    })
}

function replayed(i, j, play) {
    if (play == 'X') {
        document.getElementById('xx' + i + j).value = 'X';
        document.getElementById('xx' + i + j).style.fontSize = '35px';
        document.getElementById('xx' + i + j).style.background = '#99ccff';
        document.getElementById('OO' + i + j).disabled = true;
    } else {
        document.getElementById('xx' + i + j).value = 'O';
        document.getElementById('xx' + i + j).style.fontSize = '35px';
        document.getElementById('xx' + i + j).style.background = '#ff99cc';
        document.getElementById('OO' + i + j).disabled = true;
    }
    console.log(i, j, play);

}