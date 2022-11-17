class MyForm extends React.Component {

    constructor(props) {
        super(props)
        this.state ={
             name: '' 
        }
    }

    handleSubmit=(e)=>{
        e.preventDefault();
        console.log('name',this.state.name)
    }

    render() {
        return(
            <div>
            <h1>Entrer une nouvelle tache :</h1>

                <form onSubmit={(e)=>{this.handleSubmit(e)}}>
                    <input type="text" name="name" value={this.state.name} 
                        onChange={(e)=>{this.setState({[e.target.name]:e.target.value})}}/>
                    <input type="submit" value="Ajouter" />
                </form>
                
                {/* <p> {this.state.name} </p> */}
            </div>
        )
    }
}

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<MyForm />);