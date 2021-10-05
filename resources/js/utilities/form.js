import Error from './error';

export default class Form {

    constructor(data) {
        this.originalData = data;
        console.log(this.originalData);
        for (let field in data) {
            this[field] = data[field];
            console.log(field);
        }
        this.errors = new Error();
    }

    data() {
        let data = {};
        for (let property in this.originalData) {
            data[property] = this[property];
        }
        console.log(this);
        return data;
    }

    reset() {
        for (let field in this.originalData) {
            console.log(this.originalData)
            this[field] = '';
        }
        this.errors.clear();
    }

    onSuccess(data) {
        this.reset();
    }

    onFail(errors) {
        this.errors.record(errors);
    }
}
