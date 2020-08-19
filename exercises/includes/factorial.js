const number = 10;

const fractorial = number => {

    if (isNaN(number) || number <= 0) return 1;

    return number * fractorial(number - 1);

}

for (let i = 0; i < 100; i++) {

    console.log(i, fractorial(i));

}
let app = '';
export default app;
