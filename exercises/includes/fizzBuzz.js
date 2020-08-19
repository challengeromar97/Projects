const fizzBuzz = (number = 100) => {

    for (let i = 0; i < number; i++) {

        const answer =
            (i % 15 ? '' : 'Spider') ||
            (i % 5 ? '' : 'Ghost') ||
            (i % 3 ? '' : 'Rat') ||
            i;

        console.log(answer);

    }


}

fizzBuzz();

let app = '';
export default app;