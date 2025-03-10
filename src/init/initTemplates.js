import { render } from '@wordpress/element'
import Home from '../templates/Home'
import FrontPage from '../templates/FrontPage'

// Templates initialization
const root = document.getElementById('app-home')
root && render(<Home />, root)

const rootHome = document.getElementById('app-front-page')
rootHome && render(<FrontPage />, rootHome)