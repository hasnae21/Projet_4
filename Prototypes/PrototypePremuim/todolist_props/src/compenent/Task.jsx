import React from "react";

class Task extends React.Component{
    render(){
        return(
                    <tr>
                        <td>{this.props.name}</td>
                        <td>{this.props.description}</td>
                        <td>{this.props.Date_debut}</td>
                        <td>{this.props.Date_fin}</td>
                        <td>
                            <button onClick={()=>this.props.handeldelete(this.props.id)}>Delete</button>
                            <button onClick={()=>this.props.handeledit(this.props.id)}>modifier</button>
                        </td>
                    </tr>

        );
    }
}
export default Task;