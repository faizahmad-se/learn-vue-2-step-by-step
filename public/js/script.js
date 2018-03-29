class Errors {
    constructor() {
        this.errors = {};
    }
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }
    record(errors) {
        this.errors = errors;
    }
    has(field) {
        return this.errors.hasOwnProperty(field)
    }
    clear(field) {
        if (field) {
            delete this.errors[field];
            return;
        }
        this.errors = {};
    }
    any() {
        return Object.keys(this.errors).length > 0;
    }
}

class Form {
    constructor(data) {
        this.orignalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors;
    }

    reset() {
        for (let field in this.orignalData) {
            this[field] = '';
        }
    }

    data() {
        var data = Object.assign({}, this)
        delete data.orignalData;
        delete data.errors;

        return data;
    }

    submit(url, requestType) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                })
                .catch(error => {
                    this.onFailure(error.response.data);
                    reject(error.response.data);
                });
        });
    }

    onSuccess(response) {
        alert(response.message);
        this.reset();
        this.errors.clear();
    }

    onFailure(error) {
        this.errors.record(error.errors);
    }
}

new Vue({
    el: '#app',
    data: {
        skills: [],
        links: [],
        form: new Form({
            name: '',
            description: '',
        }),
        projects: []
    },
    methods: {
        submitForm() {
            this.form.submit('/projects', 'post').then(data => {
                this.projects.push(data.project);
            }, error => {
                console.log(error);
            });
        },
    },
    mounted() {
        axios.get('projects/all').then(response => this.projects = response.data).catch(response => console.error(response, 'errororororor'));
    }
})