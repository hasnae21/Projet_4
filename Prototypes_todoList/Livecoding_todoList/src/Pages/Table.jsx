import axios from 'axios'
import React, { Component } from 'react'

export class Table extends Component {
    state = {
        Data: [],
        name: "",
        id: ""
    }

    componentDidMount() {
        axios.get("http://127.0.0.1:8000/api/task/")
            .then(res => this.setState({
                Data: res.data
            })
            )
    }
    handleAffiche = () => {
        this.componentDidMount();
    }
    handlchange = (e) => {
        this.setState({
            name: e.target.value
        })
    }
    handladd = () => {
        console.log(this.state);
        axios.post('http://127.0.0.1:8000/api/task', this.state)
            .then(res => {
                this.handleAffiche();
                this.state.name = "";
            })
    }
    handldestroy = (id) => {
        axios.delete('http://127.0.0.1:8000/api/task/' + id)
            .then(res => {
                this.handleAffiche();
            })
    }
    handledit = (id) => {
        axios.get('http://127.0.0.1:8000/api/task/' + id + '/edit')
            .then(res => {
                this.setState({
                    name: res.data.name,
                    id: res.data.id
                })
            })
    }
    handlupdate = () => {
        let id = this.state.id;
        axios.put('http://127.0.0.1:8000/api/task/' + id, this.state)
            .then(res => {
                this.handleAffiche();
                this.state.name = "";
            })
    }

    render() {
        return (
            <div>
                <input type="text" value={this.state.name} onChange={this.handlchange} />
                <button onClick={this.handladd}>Ajouter</button>
                <button onClick={this.handlupdate}>Editer</button>
                <table>
                    <thead>
                        <tr>
                            <th>Nom Tâche</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        {this.state.Data.map((value) =>
                            <tr key={value.id}>
                                <td>{value.name}</td>
                                <td>
                                    <button onClick={this.handledit.bind(this, value.id)}>Modifier</button>
                                    <button onClick={this.handldestroy.bind(this, value.id)}>Suprimer</button>
                                </td>
                            </tr>
                        )}

                    </tbody>
                </table>
            </div>
        )
    }
}

export default Table