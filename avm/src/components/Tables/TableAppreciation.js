import * as React from 'react';
import PropTypes from 'prop-types';
import { useTheme } from '@mui/material/styles';
import Box from '@mui/material/Box';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell, { tableCellClasses } from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TablePagination from '@mui/material/TablePagination';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';
import IconButton from '@mui/material/IconButton';
import FirstPageIcon from '@mui/icons-material/FirstPage';
import KeyboardArrowLeft from '@mui/icons-material/KeyboardArrowLeft';
import KeyboardArrowRight from '@mui/icons-material/KeyboardArrowRight';
import LastPageIcon from '@mui/icons-material/LastPage';
import FilePresentIcon from '@mui/icons-material/FilePresent';
import DriveFileMoveIcon from '@mui/icons-material/DriveFileMove';
import AssignmentTurnedInIcon from '@mui/icons-material/AssignmentTurnedIn';
import { styled } from '@mui/material/styles';
import { getAppreciation } from "../../services/appreciation";
import { SkeletonTable } from "../Elements/SkeletonTable";
import { enqueueSnackbar } from "notistack";
import { useAuthContext } from "../../context/AuthContext";
import "../../components/styles/FormStyles.css";
import UploadDialog from "../Elements/UploadDialog";

const apiUrl = process.env.REACT_APP_API_URL;

export function TableAppreciation(){
    const [isLoading, setIsLoading] = React.useState(true);
    const [open, setOpen] = React.useState(false);
    const [ appreciation, setAppreciation ] = React.useState({})
    const [ rows, setRows ] = React.useState([]);
    const user = useAuthContext();
    React.useEffect(() => {
        (async () => {
            if(user.isLogged){
                getAppreciationBack();
            } else {
                enqueueSnackbar("NO TIENES PERMISOS!!", {
                    variant: "error"
                });
            }
        })()
    }, []);

    const getAppreciationBack = async () => {
        const res = await getAppreciation();
        if(res.code === "ERR_BAD_RESPONSE"){
            enqueueSnackbar('Error en el servidor... Contactarse con el equipo TI', {
                variant: "error",
            });
            setIsLoading(false)
            return;
        }
        if(res.code === 'ERR_BAD_REQUEST'){
            enqueueSnackbar('Error en el servidor... Contactece con el equipo TI.', {
                variant: 'error',
            })
            setIsLoading(false)
            return;
        }
        if(res.code === "ERR_NETWORK"){
            enqueueSnackbar('Error de conexión con el servidor', {
                variant: "error"
            });
            setIsLoading(false)
            return;
        }
        if(res.errors && res.errors.length > 0){
            enqueueSnackbar(res.errors[0].message, {
                variant: 'error'
            })
            return;
        }
        if(res.success === false){
            enqueueSnackbar('Error al buscar Valoraciones', {
                variant: "error"
            });
            setIsLoading(false);
            return;
        }
        if(res?.appreciations.length === 0){
            enqueueSnackbar('No se encontraron datos', {
                variant: "warning"
            });
            setIsLoading(false);
        }
        if(res?.appreciations.length > 0){
            console.log(res.appreciations, 'APPRECIATION TABLE');
            setRows(res.appreciations);
            setIsLoading(false);
        }
    }

    const StyledTableCell = styled(TableCell)(({ theme }) => ({
        [`&.${tableCellClasses.head}`]: {
            backgroundColor: theme.palette.common.black,
            color: theme.palette.common.white,
        },
    }));

    const StyledTableRow = styled(TableRow)(({ theme }) => ({
        '&:nth-of-type(odd)': {
            color: theme.palette.common.white,
        },
        // hide last border
        '&:last-child td, &:last-child th': {
            border: 1,
        },
    }));

    function TablePaginationActions(props) {
        const theme = useTheme();
        const { count, page, rowsPerPage, onPageChange } = props;

        const handleFirstPageButtonClick = (event) => {
            onPageChange(event, 0);
        };

        const handleBackButtonClick = (event) => {
            onPageChange(event, page - 1);
        };

        const handleNextButtonClick = (event) => {
            onPageChange(event, page + 1);
        };

        const handleLastPageButtonClick = (event) => {
            onPageChange(event, Math.max(0, Math.ceil(count / rowsPerPage) - 1));
        };

        return (
            <Box sx={{ flexShrink: 0, ml: 2.5 }}>
                <IconButton
                    onClick={handleFirstPageButtonClick}
                    disabled={page === 0}
                    aria-label="first page"
                >
                    {theme.direction === 'rtl' ? <LastPageIcon /> : <FirstPageIcon />}
                </IconButton>
                <IconButton
                    onClick={handleBackButtonClick}
                    disabled={page === 0}
                    aria-label="previous page"
                >
                    {theme.direction === 'rtl' ? <KeyboardArrowRight /> : <KeyboardArrowLeft />}
                </IconButton>
                <IconButton
                    onClick={handleNextButtonClick}
                    disabled={page >= Math.ceil(count / rowsPerPage) - 1}
                    aria-label="next page"
                >
                    {theme.direction === 'rtl' ? <KeyboardArrowLeft /> : <KeyboardArrowRight />}
                </IconButton>
                <IconButton
                    onClick={handleLastPageButtonClick}
                    disabled={page >= Math.ceil(count / rowsPerPage) - 1}
                    aria-label="last page"
                >
                    {theme.direction === 'rtl' ? <FirstPageIcon /> : <LastPageIcon />}
                </IconButton>
            </Box>
        );
    }

    TablePaginationActions.propTypes = {
        count: PropTypes.number.isRequired,
        onPageChange: PropTypes.func.isRequired,
        page: PropTypes.number.isRequired,
        rowsPerPage: PropTypes.number.isRequired,
    };
    const [page, setPage] = React.useState(0);
    const [rowsPerPage, setRowsPerPage] = React.useState(5);

    // Avoid a layout jump when reaching the last page with empty rows.
    const emptyRows =
        page > 0 ? Math.max(0, (1 + page) * rowsPerPage - rows.length) : 0;

    const handleChangePage = (event, newPage) => {
        setPage(newPage);
    };

    const handleChangeRowsPerPage = (event) => {
        setRowsPerPage(parseInt(event.target.value, 10));
        setPage(0);
    };

    const handleUploadFile = async (data) => {
        // generate fetch to back with instance for files
        console.log(data);
        setAppreciation(data);
        setOpen(true);
    }


    return(
        <>
            {isLoading ? (
                <Paper style={{backgroundColor: 'transparent', borderRadius: 16, padding: 10,}}>
                    <SkeletonTable colSpan={5} limit={5}/>
                </Paper>
            ) : (
                <Paper sx={{width: '100%' }} style={{ backgroundColor: 'transparent', borderRadius: 16  }}>
                    <TableContainer component={Paper} style={{ borderRadius: 16  }}>
                        <Table sx={{ minWidth: 700 }}  className="glass-table" aria-label="customized table">
                            <TableHead>
                                <TableRow>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Id</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Nombre Cliente</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Tipo de bien</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Dirección</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Rol</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Valoración Uf</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Valoración en pesos</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Calidad valoración</StyledTableCell>
                                    <StyledTableCell style={{ fontSize: 15 }} align="right">Acción</StyledTableCell>
                                </TableRow>
                            </TableHead>
                            <TableBody>
                                {(rowsPerPage > 0
                                        ? rows.slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage)
                                        : rows
                                ).map((row, index) => (
                                    <StyledTableRow key={index}>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.id}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.client[0].name}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.type_asset[0].name}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.address}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.rol}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.value_uf_report}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.value_pesos}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >{row.quality}</StyledTableCell>
                                        <StyledTableCell align="right" style={{ backgroundColor: '#f1f1f1', color: '#2f2f2f', borderColor: '#8d8d8d' }} >
                                        {
                                            user.user.type === 'administrator_supervisor' && (
                                                <>
                                                    { 
                                                        row.file[1]?.file_type_id === 1 ? (
                                                            <button
                                                                className="btn-icon"
                                                            >
                                                                <a href={`${apiUrl}/file/${row.file[1].path}`} download>
                                                                    <AssignmentTurnedInIcon />
                                                                </a>
                                                            </button>
                                                        ) : (
                                                            <button
                                                                className="btn-icon"
                                                                onClick={() => handleUploadFile(row)}
                                                            >
                                                                <DriveFileMoveIcon />
                                                            </button>
                                                        )
                                                    }
                                                    <button
                                                        className="btn-icon"
                                                    >
                                                        <a href={`${apiUrl}/file/${row.file[0].path}`} download>
                                                            <FilePresentIcon />
                                                        </a>
                                                    </button>
                                                </>  
                                            )
                                        }
                                        {
                                            user.user.type === 'administrator_coordinator' && row.file?.length > 1 && (
                                                <button
                                                    className="btn-icon"
                                                >
                                                    <a href={`${apiUrl}/file/${row.file[1].path}`} download>
                                                        <AssignmentTurnedInIcon />
                                                    </a>
                                                </button>
                                            )
                                        }        
                                        {
                                            user.user.type === 'administrator_coordinator' && row.file?.length === 1 && (
                                                <p> Tasacion en revision </p>
                                            )
                                        } 
                                        </StyledTableCell>
                                    </StyledTableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </TableContainer>
                    <TablePagination
                        style={{ marginTop: '10px' }}
                        rowsPerPageOptions={[5, 10, 25, 100]}
                        component="div"
                        count={rows.length}
                        rowsPerPage={rowsPerPage}
                        page={page}
                        onPageChange={handleChangePage}
                        onRowsPerPageChange={handleChangeRowsPerPage}
                    />
                </Paper>
            )}
            <UploadDialog open={open} setOpen={setOpen} appreciation={appreciation} getAppreciationback={getAppreciationBack}  />
        </>

    )
}