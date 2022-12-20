import React from "react";
import axios from "axios";
import Add from "./add";
import Task from "./Task";


class Todolist extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            list: [], name: '', Date_debut: '', Date_fin: '', description: '', id: ''
        }
    }

    affiche = () => {
        axios.get('http://127.0.0.1:8000/api/task/')
            .then(res => {
                this.setState({ list: res.data });
            });
    }
    componentDidMount = () => {
        this.affiche();
    }

    handelN = (e) => {
        this.setState({ name: e.target.value });
    }
    handelDD = (e) => {
        this.setState({ Date_debut: e.target.value });
    }
    handelDF = (e) => {
        this.setState({ Date_fin: e.target.value });
    }
    handelD = (e) => {
        this.setState({ description: e.target.value });
    }
    handelsubmit = (e) => {
        e.preventDefault();
        axios.post('http://127.0.0.1:8000/api/task/', this.state).then(res => {
            this.affiche();
            this.state.name = '';
            this.state.Date_debut = '';
            this.state.Date_fin = '';
            this.state.description = '';
        })
    }

    handeldelete = (id) => {
        axios.delete('http://127.0.0.1:8000/api/task/' + id).then(res => {
            this.affiche();
        })
    }
    handeledit = (id) => {
        axios.get('http://127.0.0.1:8000/api/task/' + id + '/edit').then(res => {
            this.setState({
                id: res.data.id,
                name: res.data.name,
                Date_debut: res.data.Date_debut,
                Date_fin: res.data.Date_fin,
                description: res.data.description
            })
        })
    }
    handelupdate = async (e) => {
        e.preventDefault();
        let id = this.state.id;
        await axios.put('http://127.0.0.1:8000/api/task/' + id, this.state).then(res => {
            this.affiche();
            this.state.name = '';
            this.state.Date_debut = '';
            this.state.Date_fin = '';
            this.state.description = '';
        })
    }


    render() {
        return (
            <div>
                <Add handelNn={this.handelN}
                    handelDD={this.handelDD}
                    handelDF={this.handelDF}
                    handelD={this.handelD}
                    handelsubmit={this.handelsubmit}
                    handelupdate={this.handelupdate}

                    id={this.state.id}
                    namee={this.state.name}
                    Date_debute={this.state.Date_debut}
                    Date_fine={this.state.Date_fin}
                    descriptione={this.state.description}
                />

                <h2>Tableau des taches</h2>
                <table border="1">
                    <thead>
                        <th>Nom</th>
                        <th>Discription</th>
                        <th>Date de debut</th>
                        <th>Date de fin</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        {this.state.list.map((value) => (
                            <Task
                                key={value.id}
                                name={value.name}
                                Date_debut={value.Date_debut}
                                Date_fin={value.Date_fin}
                                description={value.description}

                                handeldelete={() => this.handeldelete(value.id)}
                                handeledit={() => this.handeledit(value.id)}
                            />
                        ))}

                    </tbody>
                </table>
            </div>
        );
    }
}
export default Todolist;