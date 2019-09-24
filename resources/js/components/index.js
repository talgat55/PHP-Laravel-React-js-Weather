import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Main from './Main';
export default class Index extends Component {
    render() {
        return ( <Main/> );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<Index/>, document.getElementById('root'));
}
