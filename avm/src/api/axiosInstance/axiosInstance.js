import axios from "axios";
const apiUrl = process.env.REACT_APP_API_URL;

export const AxiosInstance = axios.create(
    {
        baseURL: apiUrl,
        timeout: 20000,
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
    }
)

export const AxiosInstanceFile = axios.create(
    {
        baseURL: apiUrl,
        timeout: 20000,
        headers: {
            'Content-Type': 'multipart/form-data',
            'Accept': 'application/json',
        }
    }
)

// add type of instances