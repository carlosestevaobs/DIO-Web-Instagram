for (i = 0; i < 3; i++) {
    let L = gets();
    let Vi = gets();
    let arrayV = Vi.split(" ");
    let maior = 0;
    let nivel = 0;
    maior = arrayV.reduce((a, b) => (
        Math.max(a, b)
    ))

    if (maior < 10) {
        nivel = 1;
    } else if (maior < 20) {
        nivel = 2;
    } else {
        nivel = 3;
    }
    console.log(nivel)
}