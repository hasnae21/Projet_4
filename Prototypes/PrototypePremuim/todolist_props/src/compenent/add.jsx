import React from "react";
class Add extends React.Component{
    render(){

        return(
            <div>
                <input type="text" name="name" value={this.props.namee} onChange={this.props.handelNn}/>
                <input type="datetime-local" name="Date_debut" value={this.props.Date_debute} onChange={this.props.handelDD}/>
                <input type="datetime-local" name="Date_fin" value={this.props.Date_fine} onChange={this.props.handelDF}/>
                <input type="text" name="description" value={this.props.descriptione} onChange={this.props.handelD}/>
                <button onClick={this.props.handelsubmit}>Ajouter</button>
                <button onClick={this.props.handelupdate}>Modifier</button>
            </div>
        );
    }
}
export default Add;