import axiosInstance from "./api-client";

interface Entity {
    id: number;
}

class HttpService {
    private endpoint: string;

    constructor(endpoint: string) {
        this.endpoint = endpoint;
    }

    getAll<T>() {
        return axiosInstance.get<T>(this.endpoint);
    }

    delete(id: number) {
        return axiosInstance.delete(this.endpoint + "/" + id);
    }

    create<T>(entity: T) {
        return axiosInstance.post(this.endpoint, entity);
    }

    update<T extends Entity>(entity: T) {
        return axiosInstance.patch(this.endpoint + "/" + entity.id, entity);
    }
}

const create = (endpoint: string) => new HttpService(endpoint);

export default create;
