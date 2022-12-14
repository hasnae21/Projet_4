import axios from "axios";
import React from "react";

class Table extends React.Component {

    state = {
        Data: [],
        name: "",
        id: ""
    }

    componentDidMount() {
        axios.get('http://127.0.0.1:8000/api/task')
            .then(res => this.setState({
                Data: res.data
            })
            )
    }

    handleChange = (e) => {
        this.setState({
            name: e.target.value
        })
    }

    handleAffiche = () => {
        this.componentDidMount();
    }

    handleClick = () => {
        axios.post('http://127.0.0.1:8000/api/task', this.state)
            .then(res => {
                this.handleAffiche();
            })
    }

    handleDelete = (id) => {
        axios.delete('http://127.0.0.1:8000/api/task/' + id)
            .then(res => {
                axios.get('http://127.0.0.1:8000/api/task')
                .then(res => this.setState({
                    Data: res.data
                })
                )
            })
    }
    handleEdit = (id) => {
        axios.get('http://127.0.0.1:8000/api/task/' + id + '/edit')
            .then(res => {
                this.setState({
                    name: res.data.name,
                    id: res.data.id
                })
            })
    }
    handleUpdate = () => {
        let id = this.state.id
        axios.put('http://127.0.0.1:8000/api/task/' + id, this.state)
            .then(res => {
                this.handleAffiche();
            })
    }

    render() {
        return (
            <div>
                <label>Ajouter Tâche :</label>
                <br />
                <input type="text" value={this.state.name} onChange={this.handleChange} />
                <button onClick={this.handleClick}>Ajouter</button>
                <button onClick={this.handleUpdate}>Modifier</button>
                <table>
                    <thead>
                        <tr>
                            <th><h2>List des Tâches</h2></th>
                        </tr>
                    </thead>
                    <tbody>
                        {this.state.Data.map((value) =>

                            <tr key={value.id}>
                                <td>{value.name}</td>
                                <td><button onClick={this.handleDelete.bind(this, value.id)}>Suprimer</button></td>
                                <td><button onClick={this.handleEdit.bind(this, value.id)}>Editer</button></td>
                            </tr>

                        )}
                    </tbody>
                </table>
            </div>
        )
    }
}

export default Table;