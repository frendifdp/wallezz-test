function registration(data) {
    let temp = data.split(" ")
    console.log("Input :", data)
    let noHp = ""
    let nmLengkap = ""
    let usia = ""
    let email = ""
    let status = 1;

    console.log("Output :")
    if (temp[0].length != 11 && temp[0].length != 12) {
        console.log("Nomor harus terdiri atas 11 atau 12 digit")
        status = 0
    } else if (!isNaN(temp[0])) {
        noHp = temp[0]
    } else {
        console.log("Nomor telepon salah")
        status = 0
    }

    for(i=1;i<=temp.length-3;i++){
        temp[i] = temp[i].charAt(0).toUpperCase() + temp[i].slice(1)
        nmLengkap = nmLengkap + temp[i] + ' ';
    }

    if (!isNaN(temp[temp.length - 2])) {
        usia = temp[temp.length - 2]
    } else {
        console.log("Usia salah, harus angka")
        status = 0
    }

    if(temp[temp.length - 1].search('@') == -1){
        console.log("Email salah")
        status = 0
    }
    else if (temp[temp.length - 1].split('@')[1].split('.').length == 1) {
        console.log("Email salah")
        status = 0
    }
    else {
        email = temp[temp.length - 1]
    }

    if (status == 1) {
        console.log("Nomor Handphone :", noHp)
        console.log("Nama Lengkap    :", nmLengkap)
        console.log("Usia            :", usia)
        console.log("Email           :", email)
    }
}
registration("081314121312 Alvin leonardo 39 alvin@wallezz.com")