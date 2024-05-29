import React from 'react';
import NavBar from "../../../components/NavBar/NavBar";
import {TableAppreciation} from "../../../components/Tables/TableAppreciation";
import "../../../App.css";
import "../../../components/styles/FormStyles.css"
import { Container } from "@mui/system";
import { FcPlus } from "react-icons/fc";
import { FaPlusCircle } from "react-icons/fa";
import {Footer} from "../../../components/Elements/Footer";
import {useNavigate} from "react-router-dom";
import {useAuthContext} from "../../../context/AuthContext";

export function Valoration(){
    const navigate = useNavigate();
    const user = useAuthContext();
    return (
        <>
            <NavBar/>
                <Container>
                    <br/>
                    <br/>
                    <div className='d-flex flex-row mb-2 justify-content-between'>
                        <h3 className='p-2'> Listado Valoraciones </h3>
                        {
                            user.user.type === 'administrator_coordinator' && (
                                <button
                                    className='btn-table p-2'
                                    onClick={() => {
                                        navigate('/create-appreciation')
                                    }}
                                >
                                    <FcPlus style={{fontSize: "28px", marginRight: "10px"}}/> 
                                    Crear Valoración
                                </button>
                            )
                        }
                        
                    </div>
                    <hr/>
                    <input className='input-search' placeholder='Buscar'/>
                    <TableAppreciation/>
                </Container>
                <br/>
                <br/>
                <Footer/>
        </>
    );
}