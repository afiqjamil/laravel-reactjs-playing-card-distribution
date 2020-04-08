import React, {Component} from 'react'
import ReactDOM from 'react-dom';
import axios from 'axios';

class Example extends Component {
    constructor(props) {
        super(props);
        this.state = {
            player: '',
            items: [],
            error: ''
        };

        this.onChangeValue = this.onChangeValue.bind(this);
        this.onSubmitButton = this.onSubmitButton.bind(this);
    }

    onChangeValue(e) {
        this.setState({
            [e.target.name]: e.target.value
        });
    }

    onSubmitButton(e) {
        e.preventDefault();

        axios.post('/distribute', {
            player: this.state.player
        })
            .then((response) => {
                // console.log(response.data);
                this.setState({items: response.data.result}, function(){
                    // console.log(this.state);
                })
            })
            .catch((err) => {
                console.log("Error: ", err);
            });

        this.setState({
            player: '',
            items: [],
            error: ''
        })
    }

    componentDidMount() {
    }

    render() {
        return (
            <div className="container-fluid h-100">
                <div className="row h-100">
                    <div
                        className="col-sm-6 col-2 h-100 bg-dark text-white py-2 d-flex align-items-center justify-content-center fixed-top"
                        id="left">
                        <form onSubmit={this.onSubmitButton}>
                            <div className="text-center mb-4">
                                <h1 className="h3 mb-3 font-weight-normal">Playing Card Distribution</h1>
                                <p>Enter number of player below and submit to start card distribution</p>
                            </div>

                            <div className="form-label-group">
                                <input type="number" id="player" name="player" className="form-control"
                                       placeholder="No. Of Player" min="1" required="required" value={this.state.player} onChange={this.onChangeValue}/>
                            </div>
                            <br/>
                            <button className="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

                            <br/>
                            <Error error={ this.state.error }/>
                        </form>
                    </div>
                    <div className="col-sm-6 invisible col-2"></div>
                    <div className="col offset-2 offset-sm-6 py-2">
                        <h4>Result</h4>
                        <Table items={ this.state.items }/>
                    </div>
                </div>
            </div>

        )
    }
}

class Error extends Component {
    render() {
        const error = this.props.error;

        if (error) {
            return (
                <div id="error" className="alert alert-danger" role="alert" >
                    { error }
                </div>
            )
        }

        return (<div></div>);
    }
}

class Table extends Component {
    render() {
        const items = this.props.items;
        return (
            <div id="Table">
                <table className="table" id="result">
                    <thead>
                    <tr>
                        <th scope="col">Player</th>
                        <th scope="col">Cards</th>
                    </tr>
                    </thead>
                    <tbody>
                    {items.map(item => {
                        return (
                            <tr>
                                <td>{item.player}</td>
                                <td>{item.cards.join(', ')}</td>
                            </tr>
                        );
                    })}
                    </tbody>
                </table>
            </div>
        );
    }
}

    export default Example;
    if (document.getElementById('example')) {
        ReactDOM.render(<Example/>, document.getElementById('example'));
    }
