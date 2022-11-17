class MyForm extends React.Component {

    constructor(props) {
        super(props)
        this.state ={
             name: '' 
        }
    }

    handleName=(e)=>{
        this.setState({name:e.target.value});
    }
    render() {
        return(
            <div>
                <h1>Entrer une nouvelle tache</h1>
                <form>
                    <input type="text" name="name" value={this.state.name} onChange={(e)=>{this.handleName(e)}}/>
                    {/* <input type="submit" value="Ajouter" /> */}
                    <p> {this.state.name} </p>
                </form>
            </div>
        )
    }
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<MyForm />);