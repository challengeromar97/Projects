let numbers = [];

export const happyNumber = (number, empty = true) => {
    number = Number(number);
    if (isNaN(number) || number <= 0 || !Number.isInteger(number))
        return "Wrong Number";

    if (empty)
        numbers = [];

    let str = number.toString();

    let total = 0;

    for (let i = 0; i < str.length; i++) {

        total += Math.pow(Number(str[i]), 2);

    }

    if (total !== 1 && numbers.indexOf(total) === -1) {
        numbers.push(total);
        return happyNumber(total, false);
    } else if (numbers.indexOf(total) !== -1) {
        return "Not A Happy Number!";
    } else {
        return "Congrats Thats a Happy Number!";
    }

}
