import { render, screen } from '@testing-library/react';
//import App from './App';
import sum from '../sum';

test('adds 1 + 2 to equal 3', () => {
    expect(sum(1, 2)).toBe(3);
});