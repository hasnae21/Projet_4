import React from "react";
class Add extends React.Component {
    render() {

        return (
            <div className="Form">
                <h3>Ajouter une tache</h3>
                <input type="text" name="name" value={this.props.namee} onChange={this.props.handelNn} placeholder="nom tache" />
                <br />
                <input type="text" name="description" value={this.props.descriptione} onChange={this.props.handelD} placeholder="description" />
                <br />
                <label> Date de debut du tache : </label>
                <input type="datetime-local" name="Date_debut" value={this.props.Date_debute} onChange={this.props.handelDD} />
                <br />
                <label> Date de fin de tache : </label>
                <input type="datetime-local" name="Date_fin" value={this.props.Date_fine} onChange={this.props.handelDF} />
                <br />
                <button onClick={this.props.handelsubmit}>Ajouter</button>
                <button onClick={this.props.handelupdate}>Modifier</button>

            </div>
        );
    }
}
export default Add;