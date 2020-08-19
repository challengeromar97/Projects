export class Spot {
    spot = null;
    isActive = false;
    isHighLighted = false;
    isDisabled = true;
    isInvalid = false;
    invalidNumbers = [];
    validNumber = [];

    constructor(parentName, x, y, value) {
        this.x = x;
        this.y = y;
        this.name = parentName + '-' + x + '-' + y;
        this.value = value || '';
        if (!value)
            this.isDisabled = false;

    }

    create() {
        const cellValue = this.value || '';
        const spot = document.createElement("div");
        const cellNodeValue = document.createTextNode(cellValue);

        spot.classList.add('spot');
        spot.id = this.name;

        if (cellValue)
            spot.classList.add('disabled');

        spot.appendChild(cellNodeValue);

        this.spot = spot;

        return this.spot;
    }

    active(enable) {
        if (enable) {
            this.spot.classList.add('active');
            this.isActive = true;
        } else {
            this.spot.classList.remove('active');
            this.isActive = false;
        }
    }

    highLight(enable) {
        if (enable) {
            this.spot.classList.add('highLight');
            this.isHighLighted = true;
        } else {
            this.spot.classList.remove('highLight');
            this.isHighLighted = false;
        }
    }

    setValue(value) {
        this.value = value;
        this.spot.innerHTML = value;
    }

    setInvalid(enable) {
        if (enable) {
            this.spot.classList.add('invalid');
            this.isInvalid = true;
        } else {
            this.spot.classList.remove('invalid');
            this.isInvalid = false;
        }
    }

    refresh() {
        this.active(false);
        this.highLight(false);
        this.setInvalid(false);
    }
}