import * as React from 'react';
import Button from '@mui/material/Button';
import Dialog from '@mui/material/Dialog';
import DialogActions from '@mui/material/DialogActions';
import DialogContent from '@mui/material/DialogContent';
import DialogTitle from '@mui/material/DialogTitle';
import useMediaQuery from '@mui/material/useMediaQuery';
import { useTheme } from '@mui/material/styles';
import { useForm } from "react-hook-form";
import { uploadFile } from "../../services/file";
import { useNavigate } from "react-router-dom";
import { enqueueSnackbar } from "notistack";

export default function UploadDialog(props) {
    const { open, setOpen, appreciation, getAppreciationback } = props;
    const navigate = useNavigate();
    const theme = useTheme();
    const fullScreen = useMediaQuery(theme.breakpoints.down('md'));
    const { register, handleSubmit, formState: { errors } } = useForm({
        defaultValues:{
            file: ''
        }
    });
    const handleClose = () => {
        setOpen(false);
    };
    const onSubmit = async (data) => {
        const formData = new FormData();
        formData.append('file', data.file[0]);
        formData.append('id', appreciation.id);
        const res = await uploadFile(formData);
        setOpen(false);
        if(res.success === true){
            enqueueSnackbar(res.message, {
                variant: 'success'
            });
            getAppreciationback();
        }
        if(res.success === false){
            enqueueSnackbar(res.message, {
                variant: 'error'
            });

        }
    }
    return (
        <React.Fragment>
            <Dialog
                fullScreen={fullScreen}
                open={open}
                onClose={handleClose}
                aria-labelledby="responsive-dialog-title"
            >
                <DialogTitle id="responsive-dialog-title">
                    Ingrese PDF (max 5MB)
                </DialogTitle>
                <DialogContent>
                    <form onSubmit={handleSubmit(onSubmit)} >
                        <input
                            type="file"
                            { ...register("file", {required: "Subir archivo es requerido"}) }
                        />
                        {errors.file && <p className="error-messages" role="alert">{errors.file.message}</p>}
                        <Button type="submit" >
                            Subir archivo
                        </Button>
                    </form>
                </DialogContent>
                <DialogActions>
                    <Button autoFocus onClick={handleClose}>
                        Cerrar
                    </Button>
                </DialogActions>
            </Dialog>
        </React.Fragment>
    );
}