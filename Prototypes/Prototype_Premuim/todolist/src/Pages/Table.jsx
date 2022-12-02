import axios from "axios";
import React from "react";

class Table extends React.Component {

    state = {
        Data: [],
        name_task: "",
        id: ""
    }
        
    componentDidMount() {
        axios.get('http://127.0.0.1:8000/api/task')
            .then(res => this.setState({
                Data: res.data
            })
            )
    }

    handleChange = (input) => {
        this.setState({
            name_task: input.target.value
        })
    }
    handleClick = () => {
        axios.post('http://127.0.0.1:8000/api/task', this.state)
            .then(res => {
                window.location.reload()
            })
    }
    handleDelete = (id) => {
        axios.delete('http://127.0.0.1:8000/api/task/' + id)
            .then(res => {
                window.location.reload()
            })
    }
    handleEdit = (id) => {
        axios.get('http://127.0.0.1:8000/api/task/' + id + '/edit')
            .then(res => {
                this.setState({
                    name_task: res.data.name,
                    id: res.data.id
                })
            })
    }
    handleUpdate = () => {
        let id = this.state.id
        axios.put('http://127.0.0.1:8000/api/task/' + id, this.state)
            .then(res => {
                window.location.reload()
            })
    }

    render() {
        return (
            <div>
                <label>Ajouter Tâche :</label>
                <br />
                <input type="text" value={this.state.name_task} onChange={this.handleChange} />
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