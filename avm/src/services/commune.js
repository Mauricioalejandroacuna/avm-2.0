import { AxiosInstance } from "../api/axiosInstance/axiosInstance";
import {getSanctumToken} from "../api/handleToken/handleToken";

export async function searchCommune(search){
    let token = await getSanctumToken();
    AxiosInstance.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    return AxiosInstance.post('/search-commune',
        JSON.stringify({
            search: search
        }),
    ).then((res) => {
        return res.data;
    }).catch((e) => {
        console.log(e);
        if(e.response?.data.errors){
            return { 'error': e.response.data.errors}
        }
        return e;
    })
}