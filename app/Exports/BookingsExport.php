<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Booking::all()->map(function ($booking) {
            return $this->map($booking);
        });
    }
    public function map($booking): array
    {
        $course = \App\Models\Training::find($booking->training_id);
        return [
            $booking->fullname,
            $booking->gender == 1 ? 'Nam' : 'Nữ',
            $booking->phone,
            $booking->email,
            $course->name,
            $booking->traffic,
            $booking->position,
            $booking->company,
            $booking->experience,
            $booking->note,
            $booking->created_at->format('Y-m-d H:i:s'), // Format ngày
        ];
    }

    public function headings(): array
    {
        return [
            'Họ tên',
            'Giới tính',
            'Điện thoại',
            'Email',
            'Khóa học',
            'Nguồn',
            'Chức vụ',
            'Công ty',
            'Kinh nghiệm',
            'Ghi chú',
            'Ngày tạo'
        ];
    }

    /**
     * Style header.
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Header là hàng 1
        ];
    }
}
