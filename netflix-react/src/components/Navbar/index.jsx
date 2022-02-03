import SearchBar from '../SearchBar';
import './styles.css';

export default function Navbar() {

    const pedro = () => console.log('ola');

    return (
        <nav className='nav container--fluid'>
            <div>
                <img className='nav__img' src='https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/2560px-Netflix_2015_logo.svg.png' alt=''></img>
                <ul className='nav__list'>
                    <li className='nav__item'>Home</li>
                    <li className='nav__item'>Audio & Subtitles</li>
                    <li className='nav__item'>TV Shows</li>
                    <li className='nav__item'>Movies</li>
                    <li className='nav__item'>New & Popular</li>
                    <li className='nav__item'>My List</li>
                </ul>
            </div>
            <div>
                <div>
                    <SearchBar onChange={ pedro } />
                </div>
                <div>
                    <img src='' alt=''></img>
                    <i></i>
                </div>
            </div>
        </nav>
    )
}