import axios from 'axios';

const client = axios.create({
    baseURL: '/api',
});

export default {
    all() {
        return client.get('/animals');
    },
    find(id) {
        return client.get(`/animals/${id}`);
    },
    create(data) {
        return client.post('/animals', data);
    },
    update(id, data) {
        return client.put(`/animals/${id}`, data);
    },
    delete(id) {
        return client.delete(`/animals/${id}`);
    },
    getSpecies() {
        return client.get('/species');
    }
}
